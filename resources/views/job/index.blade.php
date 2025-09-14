<div>

    <h1>Job Index Page</h1>

    <h3>my name is : {{$name}}</h3>

    <?php  foreach ($jobs as $job) {

         echo '<div>' . $job['title'] . ' : ' . $job['salarya'] . '</div>';

    }

?>




    @foreach($jobs as $job)

        <div> {{$job['title'] }} : {{$job['salarya'] }}  </div>

    @endforeach


</div>
