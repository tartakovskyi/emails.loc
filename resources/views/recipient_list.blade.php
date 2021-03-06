@extends('layouts.app')

@section('metaTitle', 'Recipients list')
@section('title', 'Recipients list')
@section('subTitle', 'You may filter the recipients or change their data')

@section('content')
<div class="row">
    <div class="col-3">
        <form id="filter">
            <div class="filter-heading">
                <h3>Filter</h3>
            </div>
            <div class="filter-block">
                <h6>Statuses</h6>
                <label>
                    <input type="checkbox" name="allStatuses" class="all" data-target="statusSet" checked>
                    <strong>All statuses</strong>
                </label>
                <fieldset id="statusSet" data-param="status" class="items-set">
                    <label>
                        <input type="checkbox" name="1" checked>
                        <span>Active</span>
                    </label>
                    <label>
                        <input type="checkbox" name="0" checked>
                        <span>Not active</span>
                    </label>
                </fieldset>
            </div>
            <div class="filter-block">
                <h6>Groups</h6>
                <label>
                    <input type="checkbox" name="allGroups" class="all" data-target="groupSet" checked>
                    <strong>All groups</strong>
                </label>
                <fieldset id="groupSet" data-param="group_id" class="items-set">
                    @foreach ($groups as $group_id => $group_name)
                    <label>
                        <input type="checkbox" name="{{$group_id}}" checked>
                        <span>{{$group_name}}</span>
                    </label>
                    @endforeach
                </fieldset>
            </div>
        </form>
    </div>
    <div class="col-9">
        <div id="recipientTableWrap"></div>
    </div>
</div>
@endsection



