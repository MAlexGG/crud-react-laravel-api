<?php

namespace App\Http\Controllers\Api;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Http\Requests\SaveCardRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateCardRequest;
use Illuminate\Support\Facades\File;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CardResource::collection(Card::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCardRequest $request)
    {
        /* return (new CardResource(Card::create($request->all())))->additional(['msg' => 'Card saved correctly']); */

        $card = Card::create($request->all());

        if ($request->hasFile('image')) {
            $card['image'] = $request->file('image')->store('img', 'public');
        }

        $card->save();

        return (new CardResource($card))->additional(['msg' => 'Card saved correctly']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return new CardResource($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        /* $card->update($request->all());
        return (new CardResource($card))->additional(['msg' => 'Card updated correctly']); */

        $card = Card::findorFail($card->id);
        $destination = public_path("storage\\".$card->image);
        $filename = "";

        if($request->hasFile('new_image')){
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $request->file('new_image')->store('img', 'public');
        } else {
            $filename = $request->image;
        }

        $card->title = $request->title;
        $card->image = $filename;
        $card->update();

        return (new CardResource($card))->additional(['msg' => 'Card updated correctly']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return (new CardResource($card))->additional(['msg' => 'Card deleted correctly']);
    }
}
