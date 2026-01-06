<div>
    <table id="tb_blog">
        <thead>
            <tr>
                <td>ID</td>
                <td>Text</td>
                <td>Edit</td>
                <td>Del</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ID</td>
                <td>Text</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function delBlog(id) {
        $.ajax({
            url: "/php/blog.php",
            type: "DELETE",
            data: {
                id: id
            },
            success: function(res) {
                console.log(id);
                
                $("#blog_msg").html(JSON.stringify(res.message));
                $("#tb_blog").load("/page/blog_tb_comment.php");
            }
        });
    }


    // let jsonUrl = "/php/blog.php";
    $.getJSON("/php/blog.php", function(jsonData) {
        $("#tb_blog tr").remove();

        jsonData.data.forEach(function(item) {
            let tbRow = `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.comment}</td>
                            <td></td>
                            <td><button onclick="delBlog(${item.id})">DEL</button></td>
                        </tr>
                        `;

            $("#tb_blog tbody").append(tbRow);
        });
    });
</script>