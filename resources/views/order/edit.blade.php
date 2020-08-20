@include('errors.error')

<form action="{{ route('orders.update', [$order->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $order->name }}">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input type="text" name="description" class="form-control" id="desciption" value="{{ $order->description }}">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">File</label>
        <input type="text" name="file" class="form-control" id="file" value="{{ $order->file }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>

