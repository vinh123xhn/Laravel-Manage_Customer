<form method="post" action=" {{ route('customers.update', $customer->id) }} ">
    @csrf
    <input type="text" name = "name" value="{{ $customer->name }}" >
    <input type="text" name = "dob" value="{{ $customer->dob }}" >
    <input type="text" name = "email" value="{{ $customer->email }}" >
    <input type="submit" value="submit">
</form>