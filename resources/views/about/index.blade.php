@extends('template.master')

@section('content')
<div class="ui container">
	<h2 class="ui header">
		<img src="{{asset('images/logo.png')}}">
	  	<div class="content">
	    	Moe Online Judge
	    	<div class="sub header">By ApaYha Team</div>
	  	</div>
	</h2>
	<p>
		Moe Online Judge is an Online Judge website that contains
		the set of problems that the user must complete by the way the user submits the solution
		of problem and online judge match solution with solution problem
		actually then issued a verdict of <a style="color: #36A2EB">"Accepted"</a>, <a style="color: #FF6384">"Wrong Answer"</a>, <a style="color: #FF9F40">"Time
		Limit Exceeded"</a>,<a style="color: #9966FF">"Memory Limit Excedeed"</a>,<a style="color: #4BC0C0">"Run Time Error"</a>. It does not just contain
		collection of problems only, but Moe Online Judge can also be a host
		competition that students of the Department of Informatics can use
		simulation of competition in the field of Competitive Programming.
	</p>
</div>
@stop
@section('left-segment')
    @include('template.us')
@stop
@section('right-segment')
    @include('template.feedback')
@stop
@section('contest-only')
    <div class="ui segments">
        <div class="ui segment">
            <h3 class="ui dividing header">Compiler dan Judger</h3>
            <ul class="ui list" style="font-size: 13px;'">
                <li>
                    C++
                </li>
                <div class="ui segment code">
                    <pre style="font-family: monospace,monospace !important;margin: 0;padding: 0;">g++ -std=c++11 source.cpp -o source -O2 -s -static -lm'.' 2>&1</pre>
                </div>
                <li>
                    Moe Contest Environtment
                </li>
                <br>
                    Moe Contest Environtment is a system for conducting programming competitions similar in spirit to the International Olympiad in Informatics – contestants solve programming tasks, submit the source code of their solutions, which is then automatically tested on a set of test inputs.
                    Moe is built in a modular way, making it easy to adapt it to the specifics of a particular contest, to other types of tasks, or other programming languages.
                    <br>
                    <strong>Build using C Languange</strong>
                </p>
            </ul>
        </div>
    </div>
    <div class="ui segments">
        <div class="ui segment">
            <h3 class="ui dividing header">Result Explanation</h3>
            <ul class="ui list" style="font-size: 13px;">
                <li><b>Juding</b> : You solution will be judged soon, please wait for result</li>
                <li><b>Compile Error</b> : Failed to compile your source code. Click on the link to see compiler's output.</li>
                <li><b><a style="color: #36A2EB">Accepted</a></b> : Congratulations. Your solution is correct.</li>
                <li><b><a style="color: #FF6384">Wrong Answer</a></b> : Your program's output doesn't match judger's answer.</li>
                <li><b><a style="color: #4BC0C0">Run Time Error</a></b> : Your program terminated abnormally. Possible reasons are: segment fault, divided by zero or exited with code other than 0.</li>
                <li><b><a style="color: #FF9F40">Time Limit Exceeded</a></b> : The CPU time your program used has exceeded limit. Python has a 5x time limit.</li>
                <li><b><a style="color: #9966FF">Memory Limit Excedeed</a></b> : The memory your program actually used has exceeded limit.</li>
                <li><b>Forbidden System Call</b> : Oops, it's forbidden using system call</li>
                <li><b>Too Late</b> : You're slow!</li>
            </ul>
        </div>
    </div>

@stop