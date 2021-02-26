<form action="{{ route('home') }}" method="GET">
    <div class="row align-items-end">
            
            <div class="col-10 col-md-11 mt-3 mt-md-0">
                <div class="mb-2">
                    <input type="search" name="search" class="form-control" placeholder="{{ old('search') ? old('search') : 'Search...' }}">
                </div>
            </div>

            <div class="col-2 col-md-1 mt-3 mt-md-0 mb-2">
                <button type="submit" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>

            <div class="col-12 col-md-3 mt-3 mt-md-0">
                <select name="category"  class="form-control">
                    <option value="">Categories</option>
                    @foreach($categories as $category)
                        <option value="{{$category}}" {{ old('category') ? 'selected' : '' }} >{{ $category}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <span class="input-group-text col-4 col-md-6 col-lg-5">Max price</span>
                    <input type="number" name="max_price" class="form-control" value="{{ old('max_price') }}">
                </div>
            </div>

            <div class="col-12 col-md-3 mt-3 mt-md-0">
                <div class="input-group">
                    <span class="input-group-text col-4 col-md-6 col-lg-5">Min price</span>
                    <input type="number" name="min_price" class="form-control" value="{{ old('min_price') }}">
                </div>
            </div>

            <div class="col-12 col-md-3 mt-3 mt-md-0">
                <select name="sorting" class="form-control">
                    <option value="">Sorting options</option>
                    <option value="price_asc" {{ old('sorting') ? 'selected' : '' }}>Price lowest to highest</option>
                    <option value="price_desc" {{ old('sorting') ? 'selected' : '' }}>Price highest to lowest</option>
                    <option value="alphabet_asc" {{ old('sorting') ? 'selected' : '' }}>A -> Z</option>
                    <option value="alphabet_desc" {{ old('sorting') ? 'selected' : '' }}>Z -> A</option>
                </select>
            </div>

    </div>
</form>