<?php
global $login_user;
?>
<div class="mainMenu">
            <h2 class="listMenu__title1">桐蔭学園中等教育学校</h2>
            <p class="listMenu__title3"><?php echo $login_user["name"]; ?><br><?php echo $login_user["grade_id"]; ?>年<?php echo $login_user["class_id"]; ?>組</p>
            <div class="listMenu__item">
                <form action="" method="get">
                    <h2 class="listMenu__title2">学年</h2>
                    <select name="" id="" class="listMenu__classSelect">
                        <option value="">学年を選択してください</option>
                        <option value="" class="">1</option>
                        <option value="" class="">2</option>
                        <option value="" class="">3</option>
                        <option value="" class="">4</option>
                        <option value="" class="">5</option>
                        <option value="" class="">6</option>
                    </select>
                    <h2 class="listMenu__title2">クラス</h2>
                    <select name="" id="" class="listMenu__classSelect">
                        <option value="">クラスを選択してください</option>
                        <option value="" class="">1</option>
                        <option value="" class="">2</option>
                        <option value="" class="">3</option>
                        <option value="" class="">4</option>
                        <option value="" class="">5</option>
                        <option value="" class="">6</option>
                        <option value="" class="">7</option>
                        <option value="" class="">8</option>
                    </select>    
                <div class="listMenu__buttonLayout">
                    <button type="submit" class="listMenu__button"><i class="fa-solid fa-magnifying-glass"></i><a href="" class="">探す</a></button>
                </div>
                </form>
                <div class="listMenu__buttonLayout2">
                    <button type="button" class="listMenu__button listMenu__button--classStudent"><i class="fas fa-user"></i><a href="find_students.php" class="">生徒を探す</a></button>
                </div>
            </div>
            <div class="listMenu__item">
                <button type="button" class="listMenu__button listMenu__button--class"><i class="fas fa-user-pen"></i><a href="/self_introduction_edit.php" class="">クラスページを編集</a></button>
            </div>
            <div class="listMenu__buttonLayout3">
                <button type="button" class="listMenu__button listMenu__button--community"><i class="fas fa-users"></i><a href="./community.php" class="">コミュニティ</a></button>
            </div>
        </div>