<div>
    <div class="row">
        <div class="form col-5">
            <form>
                <div class="mb-3">
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" class="form-control" wire:model="state.marque" id="marque" placeholder="">
                    @error('marque') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" wire:model="state.prix" id="prix" placeholder="">
                    @error('prix') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <button type="reset" wire:click.prevent="cancel" class="btn btn-secondary">Annuler</button>
                    @if ($updateMode)
                        <button type="submit" wire:click.prevent="update" class="btn btn-primary">Mettre à jour</button>
                    @else
                        <button type="submit" wire:click.prevent="store" class="btn btn-primary">Enregistrer</button>
                    @endif
                </div>
            </form>
        </div>
        <div class=" col-7">
            <h3>List des voitures</h3>
            <table class="table table-responsive table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <th scope="row">{{ $car->id }}</th>
                            <td>{{ $car->marque }}</td>
                            <td>{{ $car->prix }}</td>
                            <td>
                                <button type="button" wire:click.prevent="edit({{ $car->id }})" class="btn btn-warning btn-sm">Modifier</button>
                                <button type="button" wire:click.prevent="delete({{ $car->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
