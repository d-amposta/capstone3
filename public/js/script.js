$(document).ready(function(){    
   
	$(document).on("click", ".landing-nav", function(){
		var formToShow = $(this).attr("data-target");
		$(this).closest(".landing-form-container").fadeOut(function(){
			$("#"+formToShow+"").fadeIn();
		});
	});

    $('.mobile-search-btn').on('click', function() {
        $(".mobile-collapse:visible").hide();
        $('.mobile-search').toggle();
    });

    $(".mobile-toggle").on('click', function() {
        $(".mobile-search:visible").hide();
        $(".mobile-collapse").toggle();
    });

    function showOptions() {
        $(".options_container").css({"visibility":"visible", "opacity":1});
    }

    function hideOptions() {
        $(".options_container").css({"visibility":"hidden", "opacity":0});
    }

    $(".navbar-search").on('click', function() {
        $(".navbar-form").toggle();
    });

    $(".post-input").on('focus', function() {
        $(this).attr('rows', '3');
    });

    $(".post-input").on('focusout', function() {
        $(this).attr('rows', '1');
    });

    $(document).on('click', '.option_toggle', function() {
        var optionsContainer = $(this).next();
        var otherContainer = $(".post_header_options:visible");
        var optionsDisplay = optionsContainer.css('display');
        
        optionsContainer.toggle();
    })

    $(".profile_button").on("mouseover", function(){
        showOptions();
    });

    $(".profile_button").on("mouseleave", function() {
        hideOptions();
    });

    $(".options_container").on("mouseover", function() {
        showOptions();
    });

    $(".options_container").on("mouseleave", function() {
        hideOptions();
    });

	$('#add_friend').click(function() {
        $('#add_friend').html('Added to your Interests');
    })

    $(".input").change(function() {
        $(".file-name").text(this.files[0].name);
    });

	 function addReply(id) {
            var token = $('#token').val();
            var reply = $('#reply'+id).val();
            $.post(('add_reply/'+id), {
                _token : token,
                reply : reply,
            }, function(data) {
                $('#replies'+id).html(data);
                $('#reply'+id).val('');

            });
        }

    $(".remove_interest").on("click", function() {
        var id = $(this).attr("data-id");
        
        $.ajax({
            method: "POST",
            url: "cancelRequest/"+id,
            data: {
                id : id
            },
            success: function(data) {
                alert("success");
            }
        });
    });

    $('.add_photobutton').on('mouseover', function() {
        $('.upload_text').css('opacity', 1);
    });

     $('.add_photobutton').on('mouseleave', function() {
        $('.upload_text').css('opacity', 0);
    });
});