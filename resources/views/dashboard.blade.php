<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Dashboard') }}--}}
            Hi..<b> {{Auth::user()->name}}</b>
            <b style="float: right">Total Users
                <span class="badge rounded-pill bg-warning text-dark"></span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>


                </tbody>
            </table>

        </div>
      </div>
    </div>
</x-app-layout>
