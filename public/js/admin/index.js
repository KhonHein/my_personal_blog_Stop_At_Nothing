$(document).ready(function() {
    $postId = $(`#postId`).val();
    $viewCount = Number($('#viewCount').val());

    $viewCount = $viewCount + 1;
    $('.viewCountText').html($viewCount);
    $data = {
        'countNumber': $viewCount,
        'postId': $postId
    };

    $.ajax({
        type: 'get',
        url: 'http://127.0.0.1:8000/ajax/add_viewCount',
        data: $data,
        dataType: 'json',
        success: 'response'
    })
});



//manue bar
$(`.manueStick`).click(() => {
    let navbarCollect = $(`#navbarCollapse`);
    if (manueStick.classList.contains('clicked')) {

        manueStick.classList.remove('clicked');
        navbarCollect.classList.remove('showManues');
        navbarCollect.classList.add('hideManues');

    } else {
        manueStick.classList.add('clicked');
        navbarCollect.classList.add('showManues');
        navbarCollect.classList.remove('hideManues');
    }
});



//image preview
function previewImage() {
    const preview = document.querySelector('.selectPreviewImage');
    const file = document.querySelector('.inputPreviewImage').files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function() {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

// click likeCountButton
function clickLikeButton() {
    $like = $(`#like`);
    $lCount = Number($(`.postLikeCount`).val());
    $kissedIcon = $(`.kissedIcon`);
    if ($like.hasClass('liked')) {
        //sub add like count
        $postId = $(`#postId`).val();
        $(`.pLcountText`).html($lCount);
        $lCount = $lCount - 1;
        $data = {
            'countNumber': $lCount,
            'postId': $postId
        };
        //console.log('NO' + $countNumber);
        $.ajax({
            type: 'get',
            url: 'http://127.0.0.1:8000/ajax/add_like',
            data: $data,
            dataType: 'json',
            success: 'response'
        })
        $like.removeClass('liked');

    } else {
        $kissedIcon.addClass('kissed'); //change color
        //add like count
        $postId = $(`#postId`).val();
        $countNumber = $lCount + 1;
        $(`.pLcountText`).html($countNumber); // temproy chang in ui
        $data = {
            'countNumber': $countNumber,
            'postId': $postId
        };
        //console.log('Yes' + $countNumber);
        $.ajax({
            type: 'get',
            url: 'http://127.0.0.1:8000/ajax/add_like',
            data: $data,
            dataType: 'json',
            success: 'response'
        })

        $like.addClass('liked');

    }
}

//add unlike count
function clickUnlikeButton() {
    $unlike = $(`#unlike`);
    $ulCount = Number($(`.postULikeCount`).val());

    if ($unlike.hasClass('liked')) {
        //sub add ulike count
        $postId = $(`#postId`).val();
        $(`.pULcountText`).html($ulCount);
        $ulCount = $ulCount - 1;
        $data = {
            'countNumber': $ulCount,
            'postId': $postId
        };
        //console.log('NO' + $countNumber);
        $.ajax({
            type: 'get',
            url: 'http://127.0.0.1:8000/ajax/add_unlike',
            data: $data,
            dataType: 'json',
            success: 'response'
        })
        $unlike.removeClass('liked');

    } else {
        //add unlike count
        $postId = $(`#postId`).val();
        $ulCount = $ulCount + 1;
        $(`.pULcountText`).html($ulCount);
        $data = {
            'countNumber': $ulCount,
            'postId': $postId
        };
        //console.log('NO' + $countNumber);
        $.ajax({
            type: 'get',
            url: 'http://127.0.0.1:8000/ajax/add_unlike',
            data: $data,
            dataType: 'json',
            success: 'response'
        })
        $unlike.addClass('liked');
    }

}

//comment box
function showComents() {
    $icon = $(`.commentIcon`);
    $commentBox = $(`.commentBox`);
    if ($icon.hasClass('clicked')) {

        $icon.removeClass('clicked');
        $commentBox.removeClass('showComments');
    } else {
        $icon.addClass('clicked');
        $commentBox.addClass('showComments');
    }
}


//send comment
function sendComment() {
    $comment = $(`.commentInput`).val();
    $userCommentId = $(`#userCommentId`).val();
    $userCommentName = $(`#userCommentName`).val();
    $postId = $(`#postId`).val();

    $data = {
        'postId': $postId,
        'commentMessage': $comment,
        'userCommentId': $userCommentId,
        'userCommentName': $userCommentName,
    };

    $.ajax({
        type: 'get',
        url: 'http://127.0.0.1:8000/write_comments',
        data: $data,
        dataType: 'json',
        success: 'response'
    })
    location.reload();
}

//delete confirmm

$(`.deleteCommentIcon`).click(() => { confirm('Are you sure you want to delete this comment?'); })

// // change role


//change status button
function changeRoleFun() {
    confirm('Are you sure you want to change this role?');
}

//contact me
$(`.contactMeDiv`).hide();
$(`.contactMeBtn`).click(() => {
    if ($(`.contactMeBtn`).hasClass('clicked')) {
        $(`.coverImg`).show();
        $(`.contactMeDiv`).hide();
        $(`.contactMeBtn`).removeClass('clicked');
    } else {
        $(`.coverImg`).hide();
        $(`.contactMeDiv`).show();
        $(`.contactMeBtn`).addClass('clicked');
    }
})