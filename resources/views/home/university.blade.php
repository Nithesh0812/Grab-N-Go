<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Campus</title>
    <style>
        body {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px; /* Space between header and form */
        }

        form {
            max-width: 400px;
            width: 100%; /* Full width for small screens */
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        select:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%; /* Full width for the button */
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Select Your Campus</h1>
    <form method="POST" action="{{ url('/university') }}">
        @csrf
        <label for="campus">Select Your Campus:</label>
        <select id="campus" name="campus">
            <option value="UNT Main Campus">UNT Main Campus</option>
            <option value="Discovery Park Campus">Discovery Park Campus</option>
        </select>
        <button type="submit">Submit</button>
    </form>


</body>
</html>
