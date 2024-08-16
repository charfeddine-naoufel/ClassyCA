<h1>{{$details->course_id}} : {{$details->topic}}</h1>
<p>Bonjour,&#128512;</p>
<p>Vous êtes invité à une réunion Zoom.</p>
<p><strong>Sujet :</strong> {{$details->topic}}</p>
<p><strong>Date et Heure :</strong> {{$details->start_time}}</p>
<p><strong>Durée :</strong> {{$details->duration}} minutes</p>
<p><strong>Lien pour rejoindre :</strong> <a href="{{$details->join_url}}">{{$details->join_url}}</a></p>
<p>Merci,</p>
<p>-ClassyAcademy-</p>