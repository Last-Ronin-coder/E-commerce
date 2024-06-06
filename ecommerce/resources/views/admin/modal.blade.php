<!-- add product -->
<div class="modal fade modal-lg" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <label class="form-label" for="productTitle">Title</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="title">
                    </div>

                    <label class="form-label" for="productDescription">Description</label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea class="form-control" name="description" rows="5"></textarea>
                    </div>

                    <label class="form-label" for="productCategory">Category</label>
                    <div class="mb-3 input-group input-group-outline">
                        <select class="form-control" name="category">
                            @foreach($dataCategory as $category)
                            <option value="{{$category->category_name}}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="form-label" for="productPrice">Price</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="price">
                    </div>

                    <label class="form-label" for="productQuantity">Quantity</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="qty">
                    </div>

                    <label class="form-label" for="productImage">Image</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="file" class="form-control" name="image">
                    </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- update product -->
<div class="modal fade modal-lg" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="productForm" enctype="multipart/form-data">

                    @csrf

                    <label class="form-label" for="productTitle">Title</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" id="productTitle" name="title">
                    </div>

                    <label class="form-label" for="productDescription">Description</label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea class="form-control" id="productDescription" name="description" rows="5"></textarea>
                    </div>

                    <label class="form-label" for="productCategory">Category</label>
                    <div class="mb-3 input-group input-group-outline">
                        <select class="form-control" id="productCategory" name="category">
                            @foreach($dataCategory as $category)
                            <option value="{{$category->category_name}}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="form-label" for="productPrice">Price</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" id="productPrice" name="price">
                    </div>

                    <label class="form-label" for="productQuantity">Quantity</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" id="productQuantity" name="quantity">
                    </div>

                    <label class="form-label" for="productImage">Image</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="file" class="form-control" id="productImage" name="image">
                        <img width="50" height="50" id="productImagePreview" src="" alt="Product Image" class="img-fluid mt-2">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
            </div>

        </div>
    </div>
</div>