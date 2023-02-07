



    <div id="message-list" class="card-body py-3 px-0 comments2 comments3">

            @forelse ( $messages as $message )

                    <div class="comment-item">
                        <div class="media comment-item-user">
                            <a href="#"> <img
                                    src="https://kdmati.com/admin/uploads/13000131951641756403.jpg"
                                    class="mr-3 comment-item-image" alt="Bo-MeSHaL"></a>
                            <div class="media-body">
                                <h5 class="comment-user-name mb-1"> <a class="comment-user-link"
                                        href="https://kdmati.com/user/kdmati">{{ $message->sender->first_name.' '.$message->sender->last_name }}</a></h5>
                                <small class="comment-meta"><i class="far fa-clock fa-fw"></i>{{ $message->created_at->diffForHumans() }} </small>
                            </div>
                        </div>
                        <div class="pre comment-body">{{ $message->message }}</div>

                            @if($message->record)
                            <div class="form-group">

                                    <audio class="" style="width: 100%;" controls src="{{ asset("records/".$message->record) }}" >
                                        <source  src="{{ asset("records/".$message->record) }}" type="audio/wav">
                                    </audio>


                             </div>
                             @endif

                        @if($message->files)
                        <div class="attachments">
                            <ul class="attachments-list list-inline">
                               <?php $files = explode(",", $message->files);
                                  foreach ($files as  $key => $file) {
                                  ?>
                               <li class="list-inline-item attachments-list-item"><a target="_blank" class="btn btn-default  btn-sm  action-btn" href="{{ asset("upload/images/".$file) }}"><i class="fa fa-save"></i> ملف <?= ++$key; ?></a></li>
                               <?php } ?>
                            </ul>
                         </div>
                         @endif
                        </div>



            @empty
                لاتوجد رسايل
            @endforelse


    </div>


