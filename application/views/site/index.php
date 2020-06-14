<?php //debug($data['categories_list']); ?>
<h2>Main Page</h2>
<ul class="list-group">
    <?php foreach ($data['categories_list'] as $category): ?>
        <li class="list-group-item">
            <a href="/category/<?= $category['id']  ?>/page/1"><?= $category['name'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<!--<input type="button" value="Enter" class="buttonn btn btn-success"><br>-->
<!--<input type="submit" name="loginBtn" id="loginBtn" value="Login" />-->
<!--<span id="re" class="rows">chka</span>-->
<!--<script>-->
<!--$( document ).ready(function() {-->
<!--    $('#loginBtn').click(function () {-->
<!--        var name = $('.nameField').val();-->
<!--        var surname = $('.surNameField').val();-->
<!--        var age = $('.ageField').val();-->
<!---->
<!---->
<!--        $.ajax({-->
<!--            url: '/dbCon',-->
<!--            success: function(data) {-->
<!--                $('#re').text(data);-->
<!--            }-->
<!--        });-->
<!---->
<!--    })-->
<!--})-->
<!--</script>-->