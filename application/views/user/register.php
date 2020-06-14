<head>
    <style>
        input{
            display: block;
            margin: 10px 0px 10px 0px;
            padding: 10px 10px;
            width: 290px;
        }
        .submit_cl{
            margin: 10px 0 15px 0px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .my_reg{
            margin: 25px 0px 20px 0px;
            color: green;
            font-size: 30px;
            text-align: center;
        }
        .warnings{
            color: red;
            background: peachpuff;
            padding: 3px 0px 3px 10px;
        }
        label{
            cursor: pointer;
        }

    </style>
</head>

<h2>Sign Up</h2>

<div class="mb-5 agileits-top">

    <form action="" id="sign_up" method="post" style="width: 290px;">
        <label for="first_name">First name</label>
        <input type="text" id="first_name" name="first_name" placeholder="First name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : null ?>" >
        <label for="last_name">Last name</label>
        <input type="text" id="last_name" name="last_name" placeholder="Last name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : null ?>" >
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : null ?>" >
        <label for="password">Password</label>
        <input type="password" id="password"  name="password" placeholder="Password" value="<?= isset($_POST['password']) ? $_POST['password'] : null ?>" >
        <label for="confirm_password">Confirm password</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" value="<?= isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null ?>" >

        <?php if (isset($data['validate']) && is_array($data['validate'])): ?>
            <ul style="list-style: none;padding: 0; margin-top: 15px">
                <?php foreach ($data['validate'] as $error): ?>
                    <li class="warnings">  <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <input style="margin-top: 15px" type="submit" name="submit" class="btn-warning submit_cl" value="Sign Up">

        <b><a href="/account/login">Sign In ?</a></b>
    </form>
</div>
<div id="registered"></div>

