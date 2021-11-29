<!DOCTYPE html>
<html lang="en"
      dir="ltr">


<!-- Mirrored from demo.frontted.com/flowdash/120/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Nov 2021 15:44:48 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport" k
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Team</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots"
          content="noindex">

    <link type="text/css"
          href="{{asset('assets/css/app.css')}}"
          rel="stylesheet">
</head>

<body class="layout-default">

<div class="mdk-header-layout js-mdk-header-layout">

    <div class="mdk-header-layout__content">

        <div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                <div class="container-fluid page__heading-container">
                    <div class="page__heading d-flex align-items-end">

                    </div>
                </div>
                <div class="container page__container">
                    <div class="card card-form">
                        <div class="row no-gutters">
                            <div class="col-lg-12 card-form__body card-body">
                                <form id="create_loan_form" action="{{url('store/data')}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="payment_option">Select Team</label>
                                        <select id="payment_option" name="team_title"
                                                data-toggle="select"
                                                class="form-control form-control-md">
                                            <option selected>Select a team</option>
                                            <option value="Home Team">Home Team</option>
                                            <option value="Away Team">Away Team</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="player_number">Player Number</label>
                                        <input type="number"
                                               class="form-control"
                                               id="player_number"
                                               name="player_number"
                                               placeholder="Enter value...">
                                    </div>

                                    <div class="form-group">
                                        <label for="dunk">Dunk</label>
                                        <input type="number"
                                               class="form-control"
                                               id="dunk"
                                               name="dunk"
                                               placeholder="Enter value...">
                                    </div>

                                    <div class="form-group">
                                        <label for="shooting">Shooting</label>
                                        <input type="number"
                                               class="form-control"
                                               id="shooting"
                                               name="shooting"
                                               placeholder="Enter value...">
                                    </div>

                                    <div class="form-group">
                                        <label for="defense">Defense</label>
                                        <input type="number"
                                               class="form-control"
                                               id="defense"
                                               name="defense"
                                               placeholder="Enter value...">
                                    </div>

                                    <div class="form-group">
                                        <label for="play_making">Playmaking</label>
                                        <input type="number"
                                               class="form-control"
                                               id="play_making"
                                               name="play_making"
                                               placeholder="Enter value...">
                                    </div>

                                    <button type="submit"
                                            class="btn btn-primary float-right">Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-lg-12 card-form__body">

                                <div class="table-responsive border-bottom" data-toggle="lists"
                                     data-lists-values='["js-lists-values-employee-name"]'>
                                    <table class="table mb-0 thead-border-top-0 table-striped">
                                        <thead>
                                        <tr>
                                            <th>Team</th>
                                            <th>Player Number</th>
                                            <th>Dunk</th>
                                            <th>Shooting</th>
                                            <th>Defense</th>
                                            <th>Playmaking</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list">
                                        @foreach($team as $key => $row)
                                            <tr id="team_{{$row['id']}}">
                                                <td>{{$row['team_title']}}</td>
                                                <td>{{$row['player_number']}}</td>
                                                <td>{{$row['dunk']}}</td>
                                                <td>{{$row['shooting']}}</td>
                                                <td>{{$row['defense']}}</td>
                                                <td>{{$row['play_making']}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/vendor/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    $(document).ready(function () {

    });
</script>

</body>
</html>