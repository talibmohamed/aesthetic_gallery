<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body style="background-color: #fefaf7; font-family: Arial, sans-serif; text-align: center; color: #5f4637; padding: 20px;">

    <h2>Customer Login</h2>

    <form style="margin: 0 auto; max-width: 300px; text-align: left;">
        <!-- Email -->
        <label for="email">Email address or user name:</label><br>
        <input type="text" id="email" name="email" placeholder="Enter your email" 
               style="width: 100%; padding: 5px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px;"><br>

        <!-- Password -->
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="Enter your password" 
               style="width: 100%; padding: 5px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px;"><br>

        <!-- Button -->
        <button type="submit" 
                style="width: 100%; padding: 10px; background-color: #e0ddd8; border: none; border-radius: 5px; color: #5f4637;">
            Log in
        </button>
    </form>

    <!-- Links -->
    <p><a href="#" style="color: #5f4637;">Forgot your password?</a></p>
    <p>Don't have an account? <a href="#" style="color: #5f4637;">Sign up</a></p>
    <p>Are you a gallery artist? <a href="#" style="color: #5f4637;">Log in here</a></p>

</body>
</html>
