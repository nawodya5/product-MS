{{-- Blade Template --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Add new Item</h1>
@stop

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    <div class="card" style="width: 50rem; padding:20px;">
        <form action="addItem" method="POST">
            @csrf
            <div class="mb-3">
                <label for="item_name" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="item_name" name="item_name" required>
            </div>

            <div class="mb-3">
                <label for="supplier" class="form-label">Supplier</label>
                <input type="text" class="form-control" id="supplier" name="supplier" required>
            </div>
            
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    <div class="card" style="width: 50rem; padding:20px;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Item Number</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->supplier }}</td>
                    <td>{{ $item->quantity }}</td>

                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('editItem', $item->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>

                        <!-- Delete Form -->
                        <form action="{{ route('deleteItem', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete this item?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                        <!-- More Info Button -->
                        <a href="javascript:void(0)" class="btn btn-info descriptioninfo" data-id="{{ $item->id }}">
                            <i class="fa fa-circle-info">....</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div id="descriptionModal" class="descriptionModal">
    <p id="itemDescription"></p>
</div>

@stop

@section('css')
<style>
    .descriptionModal {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        background: #2c2c2c;
        color: #fff;
        padding: 15px;
        border-radius: 5px;
        border: 1px solid #ccc;
        z-index: 1000;
        display: none;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }

    .descriptionModal.show {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .descriptionModal::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 10px;
        border-width: 0 10px 10px 10px;
        border-style: solid;
        border-color: transparent transparent #2c2c2c transparent;
    }
</style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        console.log('clicked');
        // When the description info button is clicked
        $('.descriptioninfo').on('click', function() {
            var itemId = $(this).data('id');  

            // Send AJAX request to fetch the item description
            $.ajax({
                url: '/getItemDescription/' + itemId,
                type: 'GET',
                success: function(response) {
                    if(response.description) {
                        $('#itemDescription').text(response.description);
                        $('#descriptionModal').addClass('show');  // Show modal
                    }
                },
                error: function() {
                    alert('Error fetching description.');
                }
            });
        });

        // Close the modal
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.descriptionModal, .descriptioninfo').length) {
                $('.descriptionModal').removeClass('show');  // Hide modal
            }
        });
    });
</script>
@stop
