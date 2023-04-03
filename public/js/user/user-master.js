//container show and hide

//when click category menu
$(`.catMenuItem`).click(() => {
        $(`.catMenuItem`).hide()
        $(`.leftContainer`).show();
        $(`.hideBtn`).show();
    })
    //when click hidebtn
$(`.hideBtn`).click(() => {
    $(`.hideBtn`).hide();
    $(`.leftContainer`).hide();
    $(`.catMenuItem`).show();
})


//hover like icon
$like = $(`#likeIcon`);
$like.hover(() => {
    $like.addClass('text-warning fw-bold fs-1');
})
$like.mouseleave(() => {
    $like.removeClass('text-warning fw-bold fs-1');
})

//hover unlike
$(`#unlike`).hover(() => {
    $(`#unlike`).addClass('text-danger')
})
$(`#unlike`).mouseleave(() => {
    $(`#unlike`).removeClass('text-danger')
})

//hover comment icon
$(`#comIcon`).hover(() => {
    $(`#comIcon`).addClass('text-warning fw-bold')
})
$(`#comIcon`).mouseleave(() => {
    $(`#comIcon`).removeClass('text-warning fw-bold')
})

//preview image
$('.inputPreviewImage').on('change', function() {
    var file = this.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function() {
        $('.previewImage').attr('src', reader.result);
    }
});

//hover on profile img
$('.previewImage').hover(() => {
    $('.previewImage').removeClass('ppImage ');
    $('.previewImage').addClass('rounded-5 ');
})
$('.previewImage').mouseleave(() => {
    $('.previewImage').addClass('ppImage ');
    $('.previewImage').removeClass('rounded-5 ');
})

//when click closePassword
$(`#closePassword`).click(() => {
        $(`#passEditDiv`).addClass('hideDiv');
    })
    //hide passwrd div
function showPassDiv() {
    if ($(`#passEditDiv`).hasClass('hideDiv')) {
        $(`#passEditDiv`).removeClass('hideDiv');
    }
}

//add like count
$like = $(`#likeIcon`);
$like.click(() => {
    if ($like.hasClass('liked')) {

    } else {

    }
})

// click likeCountButton
function clickLikeButton() {
    $like = $(`#likeIcon`);
    $lCount = Number($(`.postLikeCount`).val());
    $kissedIcon = $(`.kissedIcon`);
    if ($like.hasClass('liked')) {
        //sub add like count
        $kissedIcon.removeClass('text-warning fs-5');
        $like.removeClass('text-danger');

        $kissedIcon.addClass('hideDiv');
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
            url: 'http://127.0.0.1:8000/user/Ajax/add_like',
            data: $data,
            dataType: 'json',
            success: 'response'
        })
        $like.removeClass('liked');

    } else {
        $kissedIcon.addClass('text-warning fs-5'); //change color
        $like.addClass('text-danger');
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
            url: 'http://127.0.0.1:8000/user/Ajax/add_like',
            data: $data,
            dataType: 'json',
            success: 'response'
        })

        $like.addClass('liked');
        $kissedIcon.removeClass('hideDiv');

    }
}

//add unlike count
function clickUnlikeButton() {
    $unlike = $(`#unlike`);
    $angry = $(`.angryIocon`);
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
            url: 'http://127.0.0.1:8000/user/Ajax/add_unlike',
            data: $data,
            dataType: 'json',
            success: 'response'
        })
        $unlike.removeClass('liked');
        $angry.addClass('hideDiv');

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
            url: 'http://127.0.0.1:8000/user/Ajax/add_unlike',
            data: $data,
            dataType: 'json',
            success: 'response'
        })
        $unlike.addClass('liked');
        $angry.removeClass('hideDiv');
    }

}



//when click comment icon
function clickCommentIcon() {
    $commmentBox = $(`.commentBox`);
    if ($commmentBox.hasClass('clicked')) {
        $commmentBox.removeClass('clicked');
        $commmentBox.addClass('hideDiv');
    } else {
        $commmentBox.addClass('clicked');
        $commmentBox.removeClass('hideDiv');
    }

}

function sendcomment() {
    $comment = $(`#commentInput`).val();
    $userCommentId = $(`#userCommentId`).val();
    $userCommentName = $(`#userCommentName`).val();
    $postId = $(`.postId`).val();

    $data = {
        'postId': $postId,
        'commentMessage': $comment,
        'userCommentId': $userCommentId,
        'userCommentName': $userCommentName,
    };

    $.ajax({
        type: 'get',
        url: 'http://127.0.0.1:8000/user/Ajax/comment',
        data: $data,
        dataType: 'json',
        success: 'response'
    })
    location.reload();
}

//selecte by category
function showByCategory() {
    $cat = $(`.selectByCategory`).html();
    console.log($cat);

}

//search icon hover
$(`#searchIcon`).hover(() => {
    $(`#searchIcon`).addClass('hoverOver');
    $(`#searchIcon`).addClass('text-black');
})
$(`#searchIcon`).mouseleave(() => {
    $(`#searchIcon`).removeClass('hoverOver');
    $(`#searchIcon`).removeClass('text-black');
})

//home icon hover
$(`#homeIcon`).hover(() => {
    $(`#homeIcon`).addClass('hoverOver');
    $(`#homeIcon`).addClass('text-white');
})
$(`#homeIcon`).mouseleave(() => {
    $(`#homeIcon`).removeClass('hoverOver');
    $(`#homeIcon`).removeClass('text-white');
})

//profile icon hover
$(`#profileIcon`).hover(() => {
    $(`#profileIcon`).addClass('hoverOver');
    $(`#profileIcon`).addClass('text-danger');
})
$(`#profileIcon`).mouseleave(() => {
    $(`#profileIcon`).removeClass('hoverOver');
    $(`#profileIcon`).removeClass('text-danger');
})

//cloud hover
$(`#weathierIocn`).hover(() => {
    $(`#weathierIocn`).addClass('hoverOver');
    $(`#weathierIocn`).addClass('text-warning');
})
$(`#weathierIocn`).mouseleave(() => {
    $(`#weathierIocn`).removeClass('hoverOver');
    $(`#weathierIocn`).removeClass('text-warning');
})

//cloud click

$(`#weathierIocn`).click(() => {
    if ($(`.wealthInput`).hasClass('hideDiv')) {
        $(`.wealthInput`).removeClass('hideDiv');
        $(`.cityName`).removeClass('hideDiv');
        $(`.degreeF`).removeClass('hideDiv');
        $(`.descriptionWeahter`).removeClass('hideDiv');
        $(`.weatherImg`).removeClass('hideDiv');
    } else {
        $(`.wealthInput`).addClass('hideDiv');
        $(`.cityName`).addClass('hideDiv');
        $(`.degreeF`).addClass('hideDiv');
        $(`.descriptionWeahter`).addClass('hideDiv');
        $(`.weatherImg`).addClass('hideDiv');
    }
    $(`.wealthInput`).change(() => {
        $city = $(`.wealthInput`).val();
        $appId = '76dedf7648a5009432eb945c143fa8ea';
        $url = `https://api.openweathermap.org/data/2.5/weather?q=${$city }&appid=${$appId}&units=imperial`;

        $.ajax({
            method: "get",
            url: $url,
            dataType: "json",
            success: function(response) {
                // $cityName = data.name;
                // $temp = data.main.temp + ' Fahernheit.';
                // $icon = data.weather[0].icon;
                // $desc = data.weather[0].description;
                // $imgurl = `https://openweathermap.org/img/wn/${$icon}@2x.png`;

                // $(`.cityName`).html($cityName);
                // $(`.degreeF`).html($temp);
                // $(`.descriptionWeahter`).html($desc);
                // $(`.weatherImg`).attr('src', $imgurl);
            }

        }).done(data => {
            $cityName = data.name;
            $temp = data.main.temp + ' Fahernheit.';
            $icon = data.weather[0].icon;
            $desc = data.weather[0].description;
            $imgurl = `https://openweathermap.org/img/wn/${$icon}@2x.png`;

            $(`.cityName`).html($cityName);
            $(`.degreeF`).html($temp);
            $(`.descriptionWeahter`).html($desc);
            $(`.weatherImg`).attr('src', $imgurl);
        }).fail(error => {
            // Handle the error here
            $err = error.responseText
            $(`.cityName`).html('city not found');
            $(`.degreeF`).html('');
            $(`.descriptionWeahter`).html('');
            $(`.weatherImg`).attr('src', '');
        });
    })

})