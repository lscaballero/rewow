<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\SizePet;
use App\Models\TypePet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $user_id = \Auth::user()->id;
        $pets = Pet::where('user_id', '=', $user_id)
        ->orderBy('id', 'desc')
        ->paginate();
        return view('pet.list',[
            'pets' => $pets
        ]);
    }
    /**
     * Envia campos a la vista asignada
     *
     * @return vista pet.create
     */
    public function create(){
        $types = TypePet::all();
        $sizes = SizePet::all();
        return view('pet.create', [
            'types' => $types,
            'sizes' => $sizes
        ]);
    }

    /**
     * Guarda una mascota
     *
     * @param $requiest clase para recibir los datos
     *
     * @return Una ruta de redireccion despues de guardar la mascota
     */
    public function save(Request $request)
    {
        //validación
        $valdiate = $this->validate($request, [
            'image' => 'required|mimes:jpg,png',
            'name' => 'required',
            'type' => 'required',
            'size' => 'required',
            'age' => 'required',
            'race' => 'required'
        ]);
        $image = $request->file('image');
        $name = $request->input('name');
        $type = $request->input('type');
        $size = $request->input('size');
        $age= $request->input('age');
        $race = $request->input('race');

        $pet = new Pet();
        $user_id = \Auth::user()->id;

        $pet->user_id = $user_id;
        $pet->name = $name;
        $pet->type_pet_id = $type;
        $pet->size_pet_id = $size;
        $pet->age = $age;
        $pet->race = $race;

        if ($image) {
            $image_name = time().$image->getClientOriginalName();
            Storage::disk('pets')->put($image_name, 'pet');
            $pet->image = $image_name;
        }

        $pet->save();

        return redirect()->route('pet.list')->with((['message'=>'Mascota creada correctamente']));

    }
    /**
     * Devuelve una imagen del storage
     */
    public function getImagePet($filename)
    {
        $file = Storage::disk('pets')->get($filename);
        return new Response($file, 200);
    }
}

