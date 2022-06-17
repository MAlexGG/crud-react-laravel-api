<?php

namespace App\Http\Controllers\Api;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SaveCardRequest;
use App\Http\Requests\UpdateCardRequest;

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
        $destination = public_path("storage\\" . $card->image);
        $filename = "";

        if ($request->hasFile('image')) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $request->file('image')->store('img', 'public');
        } else {
            $filename = $request->image;
        }

        $card->title = $request->title;
        $card->description = $request->description;
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
        $destination = public_path("storage\\" . $card->image);
        File::delete($destination);

        return (new CardResource($card))->additional(['msg' => 'Card deleted correctly']);
    }
}
