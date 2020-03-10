<div id="content">
    <h2>{{__('record.hello')}} {{ ucfirst($name) }} {{__('record.history')}}</h2>
    <table  class="table table table-striped table-bordered">
      <!-- ADD HEADERS -->
      <table  class="table table table-striped table-bordered mx-auto">
        <!-- ADD HEADERS -->
        <thead>
          <tr>
            <th scope="col">{{__('record.weight')}}</th>
            <th scope="col">{{__('record.height')}}</th>
            <th scope="col">{{__('record.imc')}}</th>
            <th scope="col">{{__('record.date')}}</th>
          </tr>
        </thead>
        <!-- BIND ARRAY TO TABLE -->
        <tbody>
          @foreach($message as $record)
          <tr>
            <td> {{ $record->getWeight() }}</td>
            <td> {{ $record->getHeight() }}</td>
            <td> {{ $record->getIMC() }}</td>
            <td> {{ $record->getCreatedAt() }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
