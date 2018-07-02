<div class="panel-footer">
							<!-- Button Toggles for edit post -->
							<button id="edit_post{{$post->id}}" onclick="editPost({{$post->id}})" class="inline edit btn btn-link">Edit</button>
							<button id="close_post{{$post->id}}" class="inline btn btn-link" style="display:none">Close</button>

							<!-- delete post -->
							<form method="POST" class="delete_post" action='{{url("delete_post/$post->id")}}'>
							{{csrf_field()}}
								<input type="submit" name="deletepost" value="Delete" class="btn btn-link"></input>
							</form>

							<!-- Add Reply form -->	
							<div class="row">
								<div class="col-sm-11 col-sm-offset-1">
									<div class="row">
										<div class="col-xs-1">
											<img src='/{{Auth::user()->avatar}}'>
										</div>
										<div class="col-xs-11">
											<form method="POST" action='{{url("add_reply/$post->id")}}'>
												{{csrf_field()}}
												<div class="col-xs-9">
													<div class="form-group">
														<input type="text" id='reply{{$post->id}}' name="reply" class="form-control"></input>	
													</div>
												</div>
												<div class="col-xs-2 button">
													<input type="button" id='replybutton{{$post->id}}' name="submit" value="Post Reply" class="btn btn-sm" onclick="addReply({{$post->id}})"></input>
												</div>
											</form>
										</div>
										
									</div>

						
							<!-- Reply content -->
							@if($post->reply)
								<div id="replies{{$post->id}}">
									@foreach($post->reply as $reply)
										<div class="row">
											<div class="col-xs-2 col-md-1">
												<a href=''>
													<img src='{{$reply->user->avatar}}'>
												</a>
											</div>
											<div class="col-xs-10 col-md-10">
												<a href='{{url("view_user_profile/$reply->user_id")}}'sm>
													<p class="panel-section-small"><strong class="reply">{{$reply->user->name}}: </strong></p>
												</a>
												<p class="inline timestamp">{{$reply->created_at->diffForHumans()}}</p>
											</div>
										</div>
										<!-- edit-reply -->
										<div class="row">
											<div class="col-xs-11 col-xs-offset-1">
												<p class="reply" id="reply{{$reply->id}}">{{$reply->reply}}</p>
												<form method="POST" id="editreply{{$reply->id}}" class="edit_reply" action='{{url("edit_reply/$reply->id")}}' style="display: none">
												{{csrf_field()}}
													<input type="text" name="editreply" value='{{$reply->reply}}' class="reply"></input>
													<input type="submit" value="Edit" class="btn btn-sm"></input>
												</form>
											</div>
										</div>

										@if($reply->user_id == Auth::user()->id)
										<!-- button toggle for edit reply -->
										<button id="edit_reply{{$reply->id}}" class="inline edit btn btn-link" onclick="editReply({{$reply->id}})">Edit</button>
										<button id="close_reply{{$reply->id}}" class="inline edit btn btn-link" style="display:none">Close</button>
				
										@endif

										<!-- delete reply -->
										<form method="POST" id='deletereply{{$reply->id}}' class="delete_reply" action='{{url("delete_reply/$reply->id")}}' onclick="deleteReply({{$reply->id}})">
											{{csrf_field()}}
											<input type="submit" value="Delete" class="btn btn-link"></input>
										</form>
									@endforeach
								</div><!-- div -->
							@endif

							<div class="reply_container">
                            <div class="reply_form">
                                <form method="POST" action='{{url("add_reply/$post->id")}}'>
                                    <div class="row">
                                        {{csrf_field()}}
                                        <div class="col-xs-10">
                                            <div class="form-group">
                                                <input type="text" id='reply{{$post->id}}' name="reply" class="form-control"></input>   
                                            </div>
                                        </div>
                                        <div class="col-xs-2 button">
                                            <input type="button" id='replybutton{{$post->id}}' name="submit" value="Post Reply" class="btn btn-sm" onclick="addReply({{$post->id}})"></input>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if($post->replies)
                                @foreach($post->replies as $reply)
                                <div class="reply_content">
                                    <div class="reply_avatar">
                                        <img src="">
                                    </div>
                                    <div class="reply_content">
                                        <p class="reply_auth">{{$reply->user->name}}</p>
                                        <p>{{$reply->reply}}</p>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>