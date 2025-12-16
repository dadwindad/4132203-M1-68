<div>
    <form id="fm_blog">
        <input type="text" name="blog">
        <button type="submit">SAVE</button>
    </form>
    <div id="blog_msg"></div>
</div>

<script>
    $("#fm_blog").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "/php/blog.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(res) {
                $("#blog_msg").html(JSON.stringify(res.message));
                $("#tb_blog").load("/page/blog_tb_comment.php");

                // alert(JSON.stringify(res.message));
            }
        })

    });
</script>