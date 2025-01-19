<form action="{{ route('pets.create') }}" method="POST">
    @csrf
    @method('POST')
        <div class="mb-3">
            <label for="name" class="form-label">Enter Name</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name') {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Enter Photo URL</label>
            <input type="photo" class="form-control" id="photo" name="photo">
            @error('photo') {{ $message }}
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add New</button>
    </div>
</form>
