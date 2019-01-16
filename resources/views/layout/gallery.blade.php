<style>
.grid { 
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-gap: 1px;
  align-items: start;
  justify-items: center;
  }
.grid img {
  max-width: 100%;
}
.grid img:nth-child(2) {
  grid-column: span 3;
  grid-row: span 3;
  }
</style>
<h4>Your Gallery</h4>
<main class="grid">
	@foreach($gallery as $value)
		<img src="{{ asset('storage/gallery/'.$value->image) }}" alt="Sample photo">
	@endForeach

	@for($a=count($gallery) ; $a < 12; $a++)
		<img src="{{ asset('images/no-photo-available.png') }}" alt="Sample photo">
	@endFor
</main>