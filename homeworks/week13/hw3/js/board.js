/* eslint-disable max-len */
/* eslint-disable no-undef */
// 新增留言
$( document ).ready( function() {
  function addComment( id, nickname, content, createdAt ) {
    return `
    <div id="comment" class="card mb-3 p-1">
      <div class="card-body">
        <div class="card-title mb-1">${nickname}
          <small class="text-muted ml-2"> 發表於 ${createdAt}</small>
        </div>

        <div class="row">
          <p class="card-text col-7">
            ${content}
          </p>
          <div class="col-5 d-flex justify-content-end">
            <span class="mr-2">
              <form action="./edit_comment.php" method="GET">
                <input type="hidden" name="id" value="${id}">
                <input class="btn btn-outline-dark btn-sm" type="submit" value="編輯留言">
              </form>
            </span>
            <span>
              <form class="del-post">
                <input id="del-btn" class="btn btn-outline-dark btn-sm" type="submit" data-id="${id}" value="刪除留言">
              </form>
            </span>
          </div>
        </div>
        
        <hr>
      
        <form class="sub-post mx-auto">
          <input type="hidden" name="parent_id" value="<?php echo ${id} ?>">
          <div class="input-group text-center mt-4">

            <textarea class="form-control mr-3" name="content" type="text" rows="2" placeholder="來留個言吧⋯⋯"></textarea>
            <span>
              <div class="row">
                <div class="col-10">
                  
                    <input class="btn btn-dark btn-sm" type="submit" value="回覆">

                </div>
              </div>
              <input type="hidden" name="nickname" value="${nickname}">
            </span>
          </div>
        </form>
      </div>
    </div>
    `;
  }

  function addSubComment( id, nickname, content, createdAt ) {
    return `
    <div id="sub-comment">
      <div class="card-title mb-1">${nickname}
        <small class="text-muted ml-2"> 發表於 ${createdAt}</small>
      </div>

      <div class="row">
        <p class="card-text col-7 original-poster">${content}</p>
        <div class="col-5 d-flex justify-content-end">
          <span class="mr-2">
            <form action="./edit_comment.php" method="GET">
              <input type="hidden" name="id" value="${id}">
              <input class="btn btn-outline-dark btn-sm" type="submit" value="編輯留言">
            </form>
          </span>
          <span>
            <form class="del-post">
              <input id="del-btn" class="btn btn-outline-dark btn-sm" type="submit" data-id="${id}" value="刪除留言">
            </form>
          </span>
        </div>
      </div>
    </div>
  `;
  }

  // FIXME 跳脫字元

  $( "form.post, form.sub-post, form.del-post" ).submit( function( e ) {
    e.preventDefault();
    const content = $( e.target )
      .find( "textarea[name='content']" )
      .val();
    const parentId = $( e.target )
      .find( "input[name='parent_id']" )
      .val();
    if ( content === "" ) {
      alert( "請輸入留言" );
    } else {
      $.ajax( {
        type: "POST",
        url: "add_comment.php",
        data: {
          content: content,
          parent_id: parentId
        }
      } ).done( function( response ) {
        $( "textarea[name='content']" ).val( "" );
        const msg = JSON.parse( response );
        const [ id, nickname, content, createdAt ] = [
          msg.id,
          msg.nickname,
          msg.content,
          msg.created_at
        ];
        if ( parentId === "0" ) {
          $( "#comments >.col-10" ).prepend(
            addComment( id, nickname, content, createdAt )
          );
        } else {
          $( e.target )
            .closest( "form.sub-post" )
            .before( addSubComment( id, nickname, content, createdAt ) );
        }
      } );
    }
  } );

  // 刪除留言

  $( "#comments" ).on( "click", "#del-btn", function( e ) {
    if ( !confirm( "確定要刪除？" ) ) {
      return;
    }
    const id = $( e.target ).attr( "data-id" );
    $.ajax( {
      type: "POST",
      url: "delete_comment.php",
      data: {
        id
      }
    } )
      .done( function( response ) {
        const msg = JSON.parse( response );
        alert( msg.message );
        const subComment = $( e.target ).closest( "#sub-comment" );
        console.log( subComment );
        if ( subComment.length === 0 ) {
          $( e.target )
            .closest( "#comment" )
            .fadeOut( 300, function() {
              $( this ).remove();
            } );
        } else {
          subComment.fadeOut( 300, function() {
            $( this ).remove();
          } );
        }
      } )

      // FIXME ajax 留言刪除異常，要再按一次才可以刪除
      .fail( function( response ) {
        const msg = JSON.parse( response );
        alert( msg.message );
      } );
  } );
} );
