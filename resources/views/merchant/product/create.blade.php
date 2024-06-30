@extends('merchant.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Product</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('merchant.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label>Offer Price</label>
                        <input type="text" name="offer_price" class="form-control" value="{{ old('offer_price') }}">
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="deskripsi" class="form-control summernote" id="">{{ old('deskrpsi') }}</textarea>
                    </div>



                    <div class="form-group">
                        <label>Show at Home</label>
                        <select name="show_at_home" class="form-control" id="">
                            <option value="1">Yes</option>
                            <option selected value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
