<?php

namespace App\Http\Livewire;

use App\Models\CategoriaProducto;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Productos extends Component
{
    use WithPagination, WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_producto, $descripcion, $img_datos, $img_producto, $categoria_id;
    public $img_datos_edit, $img_producto_edit,$new_image_prod,$new_image_datos;
    public $updateMode = false;
    public $identificador,$categorias;

    public function mount()
    {
        $this->identificador = rand();
        $this->categorias = CategoriaProducto::all()->pluck('marca', 'id');
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.productos.view', [
            'productos' => Producto::with('categoria')->latest()
						->orWhere('nombre_producto', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('img_datos', 'LIKE', $keyWord)
						->orWhere('img_producto', 'LIKE', $keyWord)
						->orWhere('categoria_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    // public function borraImgTemporal()
    // {
    //     // dd($this->img_producto->path());
    //     $this->borrarImagenTemp($this->img_producto->temporaryUrl());
    //     $this->borrarImagenTemp($this->img_datos->temporaryUrl());

    // }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
    private function ressetDatos()
    {
        $this->reset(
            [
                'selected_id',
                'keyWord',
                'nombre_producto',
                'descripcion',
                'img_datos',
                'img_producto',
                'categoria_id',
                'img_datos_edit',
                'img_producto_edit',
                'new_image_prod',
                'new_image_datos'
            ]
            );
    }

    private function resetInput()
    {
		$this->nombre_producto = null;
		$this->descripcion = null;
		$this->img_datos = null;
		$this->img_producto = null;
		$this->categoria_id = null;
    }
    private function resetInputImage()
    {
		$this->img_producto_edit = null;
		$this->img_datos_edit = null;
    }

    public function guardarImg($file, $carpeta)
    {
        $fecha = new \Carbon\Carbon();
        $name_img = $fecha->format('dmy_hms').rand();
        $ext_image = $file->extension();
        return $file->storeAs("public/".$carpeta,$name_img.'.'.$ext_image);
    }
    public function borrarImagen($ruta_name)
    {
        //quitar public
        $ruta_name = str_replace('public/','',$ruta_name);
        $destination = public_path('storage\\'.$ruta_name);
        if(File::exists($destination)){
            session()->flash('message', 'Archivo Borrado.');
            File::delete($destination);
            // Storage::delete('public/'.$ruta_name);
        }
    }

    public function store()
    {
        $this->validate([
		'nombre_producto' => 'required',
		'descripcion' => 'required',
		'img_producto' => 'required',
		'categoria_id' => 'required|min:1',
        ]);
        $nombre_img_datos = $nombre_img_producto = '';
        if(isset($this->img_datos)){
            $nombre_img_datos = $this->guardarImg($this->img_datos, 'productos');
        }
        $nombre_img_producto = $this->guardarImg($this->img_producto, 'productos');
        Producto::create([
			'nombre_producto' => $this-> nombre_producto,
			'descripcion' => $this-> descripcion,
			'img_datos' => $nombre_img_datos,
			'img_producto' => $nombre_img_producto,
			'categoria_id' => $this-> categoria_id
        ]);

        // $this->resetInput();
        // $this->resetInputImage();
        $this->ressetDatos();
        $this->identificador = rand();
		$this->emit('closeModal');
		session()->flash('message', 'Producto creado correctamente.');
    }

    public function edit($id)
    {
        $record = Producto::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre_producto = $record-> nombre_producto;
		$this->descripcion = $record-> descripcion;
		$this->img_datos_edit = $record-> img_datos;
		$this->img_producto_edit = $record-> img_producto;
		$this->categoria_id = $record-> categoria_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre_producto' => 'required',
		'descripcion' => 'required',
		'img_producto_edit' => 'required',
		'categoria_id' => 'required',
        ]);

        if ($this->selected_id) {
            $nombre_img_producto = $this->img_producto_edit;
            $nombre_img_datos = $this->img_datos_edit;
            if($this->new_image_prod != null){
                $nombre_img_producto = $this->guardarImg($this->new_image_prod, 'productos');
                $this->borrarImagen($this->img_producto_edit);
            }
            if($this->new_image_datos != null){
                $nombre_img_datos = $this->guardarImg($this->new_image_datos, 'productos');
                $this->borrarImagen($this->new_image_datos);
            }
			$record = Producto::findOrfail($this->selected_id);
            $record->update([
			'nombre_producto' => $this-> nombre_producto,
			'descripcion' => $this-> descripcion,
			'img_datos' => $nombre_img_datos,
			'img_producto' => $nombre_img_producto,
			'categoria_id' => $this-> categoria_id
            ]);

            // $this->resetInput();
            // $this->resetInputImage();
            $this->ressetDatos();
            $this->identificador = rand();
            $this->updateMode = false;
			session()->flash('message', 'Producto actualizado correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Producto::findOrFail($id);
            $this->borrarImagen($record->img_datos);
            $this->borrarImagen($record->img_producto);
            $record->delete();
        }
    }
}
