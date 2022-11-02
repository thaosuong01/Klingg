$(function () {
    $("#rateYo").rateYo({
        starWidth: "25px"
    }).on("rateyo.change", function (e, data) {

        var rating = data.rating;
        document.querySelector('.num_start').textContent = rating;

    });
    $(".rateyo").rateYo({
        starWidth: "25px"
    });
    const formComment = document.querySelector('.review-form-input');
    const list_comment = document.querySelector('.list_comment');

    function renderComment(item){
        let template = `
        <div class="review-post">
        <div class="rateyo"
                data-rateyo-rating="${item.rating}"
            
                data-rateyo-read-only="true"
                ></div>
        <div class="review-header">
         
            <div class="review-date">
                <p><b>${item.name}</b> on <b>${item.created_at}</b></p>
            </div>
        </div>
        <div class="review-content">
            <p>${item.comment}</p>
        </div>
    </div>   
        
        `;
        $(".rateyo").rateYo();

        list_comment.insertAdjacentHTML('beforeend',template);
    }
    let commentText =  document.querySelector('.comment');
    formComment.addEventListener('submit', function (e) {
        e.preventDefault();
        const ratingNum = document.querySelector('.num_start').textContent;
        const comment = document.querySelector('.comment').value;
        const url = this.getAttribute('action');
        const user_id = e.target.dataset.userid;
        const pro_id = e.target.dataset.proid;
        
        if (+ratingNum <= 0) {
            alert('Phai danh gia sao');
        }
        else {
            $.ajax({
                url: url,
                type: "POST",
                data: { ratingNum, comment, user_id, pro_id },
                dataType: "text",
                success: function (data) {
                    let response = JSON.parse(data);
                    list_comment.innerHTML = '';
                    response.length > 0 && response.forEach(item=>{
                        renderComment(item);
                    })
                    commentText.value = '';
                },
                error: function (e) {
                    console.log(e);
                },
            })
        }
    })


});
