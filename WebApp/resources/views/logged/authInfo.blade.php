<form action="/">
    <label for="firstname"></label>
    <input type="text" name="firstname" value="{{ $user['name'] }}">

    <label for="lastname"></label>
    <input type="text" name="lastname" value="{{ $user['lastname'] }}">

    <label for="number"></label>
    <input type="text" name="number" value="{{ $user['number'] }}">

    <label for="email"></label>
    <input type="text" name="email" value="{{ $user['email'] }}">

    <label for="password"></label>
    <input type="text" name="password" value="{{ $user['password'] }}">
</form>
