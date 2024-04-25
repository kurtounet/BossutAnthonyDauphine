<form>
    <div class="form-group">
        <label for="pokedexId">Pokedex ID:</label>
        <input type="number" class="form-control" id="pokedexId" name="pokedexId" required>
    </div>
    <div class="form-group">
        <label for="nameFr">French Name:</label>
        <textarea class="form-control" id="nameFr" name="nameFr" required></textarea>
    </div>
    <div class="form-group">
        <label for="nameJp">Japanese Name:</label>
        <textarea class="form-control" id="nameJp" name="nameJp" required></textarea>
    </div>
    <div class="form-group">
        <label for="generation">Generation:</label>
        <input type="number" class="form-control" id="generation" name="generation" required>
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <textarea class="form-control" id="category" name="category" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image URL:</label>
        <input type="text" class="form-control" id="image" name="image" required>
    </div>
    <div class="form-group">
        <label for="imageShiny">Shiny Image URL:</label>
        <input type="text" class="form-control" id="imageShiny" name="imageShiny">
    </div>
    <div class="form-group">
        <label for="height">Height:</label>
        <input type="number" step="0.01" class="form-control" id="height" name="height" required>
    </div>
    <div class="form-group">
        <label for="weight">Weight:</label>
        <input type="number" step="0.01" class="form-control" id="weight" name="weight" required>
    </div>
    <div class="form-group">
        <label for="catchRate">Catch Rate:</label>
        <input type="number" step="0.01" class="form-control" id="catchRate" name="catchRate">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>