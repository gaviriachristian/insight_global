jq = jQuery.noConflict();
jq(function( $ ) {
  jq('#selector_vehicles').change(function(){
      const url = jq('#keys_url').val() + '?vehicle=' + jq('#selector_vehicles').val();
      
      fetch(url)
        .then( res => res.json())
        .then(data => {
            jq('#selector_keys').html('<option selected value="">--Select Key--</option>');
            data.forEach(key => {
                jq('#selector_keys').append(
                    '<option value=' + key.id + '>' + key.name + ' | ' + key.description + ' | ' + key.price + '</option>'
                );
            });
        })
        .catch(error => console.log(error));
  })
});