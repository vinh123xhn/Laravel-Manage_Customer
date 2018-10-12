<form method="post" action=" {{ route('customers.store') }} ">
    @csrf
    <input type="text" name = "name" placeholder="nhap ten" >
    <input type="text" name = "dob" placeholder="nhap dob" >
    <input type="text" name = "email" placeholder="nhap email" >
    <input type="submit" value="submit">
</form>