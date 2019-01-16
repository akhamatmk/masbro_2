
<style>
.item1 { grid-area: 1 / 1 / 2 / 2; }
.item2 { grid-area: 1 / 2 / 2 / 3; }
.item3 { grid-area: 1 / 3 / 2 / 4; }
.item4 { grid-area: 2 / 1 / 3 / 2; }
.item5 { grid-area: 2 / 2 / 3 / 3; }
.item6 { grid-area: 2 / 3 / 3 / 4; }

.grid-container {
  display: grid;
  grid-gap: 2px;
}

.feed{
  margin-top: 10px;
  background: #f2f2f2; 
  padding: 10px;
  box-shadow: 0 0 0 1px rgba(0,0,0,.15), 0 2px 3px rgba(0,0,0,.2);
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
}
</style>

<div style="margin: 10px">
    <h4>Your Feed's</h4>
    
    @foreach($posts as $post)
      <div class="feed">
        <p style="text-align: justify">{{ $post->post }}</p>
        @if(count($post->gallery) > 0)
          <div class="grid-container">
            @foreach($post->gallery as $key => $gallery)
              <div class="item{{ $key+1 }}"><img src="{{ url('storage/gallery/'.$gallery->image) }}"></div>
            @endForeach
          </div>
        @endIf
      </div>
    @endForeach
</div>

