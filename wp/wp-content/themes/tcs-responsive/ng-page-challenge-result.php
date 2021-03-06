<div ng-controller="SubmissionCtrl as subCtrl">
<article ng-if="CD.isDesign && CD.submissions.length > 0" ng-hide="subCtrl.singleViewMode">
    <div ng-if="CD.firstPlaceSubmission" ng-repeat="submission in CD.winningSubmissions" class="winnerRow {{$index > 1 ? 'hideOnMobi' : ''}}">
        <div class="place {{['first', 'second', 'third', 'other'][$index]}}">{{$index + 1}}<span>{{(placeSuffix = ['st', 'nd', 'rd'][$index]) ? placeSuffix : 'th'}}</span></div>
        <!-- #/end place-->
        <div class="image">
            <img ng-src="{{submission.previewDownloadLink ? submission.previewDownloadLink : '/wp-content/themes/tcs-responsive/i/img-locked.png'}}" alt="winner"/>
        </div>

        <!-- #/end image-->
        <div class="details">
            <a href="<?php bloginfo('wpurl'); ?>/member-profile/{{submission.handle}}" class="coderTextOrange">{{submission.handle}}</a>
            <div class="">
                <h3>${{CD.challenge.prize[$index]}}</h3>
                <span class="title">PRIZE</span>
                <span class="date">Registration Date</span>
                <span class="time">{{submission.registrationDate | formatDate}}</span>
            </div>
            <div class="">
                <h3>{{submission.points}}</h3>
                <span class="title">Studio Cup Points</span>
                <span class="date">Submitted Date</span>
                <span class="time">{{submission.submissionDate | formatDate}}</span>
            </div>
        </div>
        <!-- #/end details-->
        <div class="actions" ng-show="{{subCtrl.submissionsViewable || submission.handle == CD.handle}}">
            <a href="javascript:;" ng-click="subCtrl.viewSubmission(submission, true)" class="view">View</a>
            <a href="{{submission.submissionDownloadLink}}" ng-click="" class="download">Download</a>
        </div>
        <!-- #/end actions-->
        <div class="clear"></div>
    </div>

    <!--#/end winnerrow-->
    <div class="winnerRow hideOnMobi hide">
        <div class="place other client">CLIENT<span>SELECTION</span></div>
        <!-- #/end place-->
        <div class="image">
            <img src="" alt="winner" alt="winner"/>
        </div>
        <!-- #/end image-->
        <div class="details">
            <a href="javascript:" class="coderTextOrange">Usernamegoeshere</a>
            <div class="">
                <h3>$200</h3>
                <span class="title">PRIZE</span>
                <span class="date">Registration Date</span>
                <span class="time">01.07.2014 09:37 AM EST</span>
            </div>
            <div class="">
                <h3>100</h3>
                <span class="title">Studio Cup Points</span>
                <span class="date">Submitted Date</span>
                <span class="time">01.07.2014 09:37 AM EST</span>
            </div>
        </div>
        <!-- #/end details-->
        <div class="actions">
            <a href="" class="view" class="view">View</a>
            <a href="" class="download">Download</a>
        </div>
        <!-- #/end actions-->
        <div class="clear"></div>
    </div>
    <!--#/end winnerrow-->
    <div class="showMore hideOnMobi hide">
        <a class="fiveMore" href="javascript:">5 more winners</a>
    </div>
    <!--#/end showMore-->
    <div class="competitionDetails">
        <div class="registrant">
            <h2>Registrants</h2>
            <div class="values">
                <span class="count"><a ng-click="showRegistrants();" class="link">{{CD.challenge.numberOfRegistrants}}</a></span>
            </div>
        </div>
        <!--#/end registrant-->
        <div class="round {{CD.numCheckpointSubmissions == -1 ? 'hide' : ''}}">
            <h2>Round 1 (Checkpoint)</h2>
            <div class="values">
                <span class="count">{{CD.numberOfUniqueSubmitters}}<span class="sup">&nbsp;</span></span>
                <span class="type">Submitters</span>
                <span class="type">&nbsp;</span>
            </div>
            <div class="values">
                <span class="count">{{CD.numberOfPassedScreeningUniqueSubmitters}}<span class="sup">({{CD.checkpointPassedScreeningSubmitterPercentage}}%)</span></span>
                <span class="type">Passed Screening</span>
                <span class="type">Submitters</span>
            </div>
            <div class="values">
                <span class="count">{{CD.numberOfPassedScreeningSubmissions}}<span class="sup">({{CD.checkpointPassedScreeningSubmissionPercentage}}%)</span></span>
                <span class="type">Passed Screening</span>
                <span class="type">Submissions</span>
            </div>
        </div>
        <!--#/end round-->
        <div class="round round2">
            <h2>Round 2 (Final)</h2>
            <div class="values">
                <span class="count">{{CD.numFinalSubmitters}}<span class="sup">&nbsp;</span></span>
                <span class="type">Submitters</span>
                <span class="type">&nbsp;</span>
            </div>
            <div class="values">
                <span class="count">{{CD.finalSubmittersPassedScreening}}<span class="sup">({{CD.finalPassedScreeningSubmitterPercentage}}%)</span></span>
                <span class="type">Passed Screening</span>
                <span class="type">Submitters</span>
            </div>
            <div class="values">
                <span class="count">{{CD.finalSubmissionsPassedScreening}}<span class="sup">({{CD.finalPassedScreeningSubmissionPercentage}}%)</span></span>
                <span class="type">Passed Screening</span>
                <span class="type">Submissions</span>
            </div>
        </div>
        <!--#/end round-->
        <div class="clear"></div>
    </div>
    <!--#/end competitionDetails-->
</article>

<article ng-if="!CD.isDesign && CD.submissions.length > 0">
    <div ng-if="CD.challenge.challengeType != 'Code' && CD.firstPlaceSubmission" class="winnerRow">
        <div class="place first">1<span>st</span></div>
        <!-- #/end place-->
        <div class="details">
            <a href="<?php bloginfo('wpurl'); ?>/member-profile/{{CD.firstPlaceSubmission.handle}}" class="coderTextYellow">{{CD.firstPlaceSubmission.handle}}</a>
        </div>
        <!-- #/end details-->
        <div class="price">
            <span class="price">${{CD.challenge.prize[0]}}</span>
            <span>PRIZE</span>
        </div>
        <!-- #/end price-->
        <div class="point" ng-show={{CD.firstPlaceSubmission.points}}>
            <span class="point">{{CD.firstPlaceSubmission.points}}</span>
            <span>DR POINTS</span>
        </div>
        <!-- #/end price-->
        <div class="actions" ng-show="{{subCtrl.submissionsViewable || CD.firstPlaceSubmission.handle == CD.handle}}">
            <a href="{{CD.firstPlaceSubmission.submissionDownloadLink}}" class="download">Download</a>
        </div>
        <!-- #/end actions-->
        <div class="clear"></div>
    </div>
    <!--#/end winnerrow-->
    <div ng-if="CD.challenge.challengeType != 'Code' && CD.secondPlaceSubmission && CD.challenge.prize[1]" class="winnerRow">
        <div class="place second">2<span>nd</span></div>
        <!-- #/end place-->
        <div class="details">
            <a href="<?php bloginfo('wpurl'); ?>/member-profile/{{CD.secondPlaceSubmission.handle}}" class="coderTextGray">{{CD.secondPlaceSubmission.handle}}</a>
        </div>
        <!-- #/end details-->
        <div class="price">
            <span class="price">${{CD.challenge.prize[1]}}</span>
            <span>PRIZE</span>
        </div>
        <!-- #/end price-->
        <div class="point" ng-show={{CD.secondPlaceSubmission.points}}>
            <span class="point">{{CD.secondPlaceSubmission.points}}</span>
            <span>DR POINTS</span>
        </div>
        <!-- #/end price-->
        <div class="actions" ng-show="{{subCtrl.submissionsViewable || CD.secondPlaceSubmission.handle == CD.handle}}">
            <a href="{{CD.secondPlaceSubmission.submissionDownloadLink}}" class="download">Download</a>
        </div>
        <!-- #/end actions-->
        <div class="clear"></div>
    </div>
    <!--#/end winnerrow-->
    <div ng-if="CD.challenge.challengeType == 'Code' && CD.firstPlaceSubmission" ng-repeat="submission in CD.winningSubmissions" class="winnerRow">
        <div class="place {{['first', 'second', 'third', 'other'][$index]}}">{{$index + 1}}<span>{{(placeSuffix = ['st', 'nd', 'rd'][$index]) ? placeSuffix : 'th'}}</span></div>
        <!-- #/end place-->
        <div class="details">
            <a href="<?php bloginfo('wpurl'); ?>/member-profile/{{submission.handle}}" class="coderTextYellow">{{submission.handle}}</a>
        </div>
        <!-- #/end details-->
        <div class="price">
            <span class="price">${{CD.challenge.prize[$index]}}</span>
            <span>PRIZE</span>
        </div>
        <!-- #/end price-->
        <div class="point" ng-show={{submission.points}}>
            <span class="point">{{submission.points}}</span>
            <span>DR POINTS</span>
        </div>
        <!-- #/end point-->
        <div class="actions">
            <a href="{{submission.submissionDownloadLink}}" class="download">Download</a>
        </div>
        <!-- #/end actions-->
        <div class="clear"></div>
    </div>
    <!--#/end winnerrow-->
    <table class="registrantsTable hideOnMobi">
        <thead>
        <tr>
            <th class="leftAlign">
                <a href="javascript:" class="">Username</a>
            </th>
            <th>
                <a href="javascript:" class="">Registration Date</a>
            </th>
            <th>
                <a href="javascript:" class="">Submission Date</a>
            </th>
            <th>
                <a href="javascript:" class="">Screening Score</a>
            </th>
            <th>
                <a href="javascript:" class="">Initial / Final Score</a>
            </th>
            <th>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="submission in CD.submissions" class="{{$index % 2 == 1 ? 'alt' : ''}}">
            <td class="leftAlign"><a href="<?php bloginfo('wpurl'); ?>/member-profile/{{submission.handle}}" class="coderTextGray">{{submission.handle}}</a></td>
            <td>{{submission.registrationDate | formatDate}}</td>
            <td>{{submission.submissionDate | formatDate}}</td>
            <td><span class="pass">{{submission.screeningScore}}</span></td>
            <td><span class="initialScore">{{submission.initialScore}}</span>/<a href="javascript:" class="finalScore">{{submission.finalScore}}</a> </td>
            <td><a href="{{submission.submissionDownloadLink}}" ng-show="{{subCtrl.submissionsViewable || submission.handle == CD.handle}}">Download</a></td>
        </tr>
        </tbody>
    </table>
    <div class="registrantsTable onMobi">

        <div ng-repeat="submission in CD.submissions" class="registrantSection">
            <div class="registrantSectionRow registrantHandle"><a href="<?php bloginfo('wpurl'); ?>/member-profile/{{submission.handle}}" class=" coder coderTextYellow">{{submission.handle}}</a></div>
            <div class="registrantSectionRow">
                <div class="registrantLabel">Registration Date:</div>
                <div class="registrantField">{{submission.registrationDate | formatDate}}</div>
                <div class="clear"></div>
            </div>
            <div class="registrantSectionRow">
                <div class="registrantLabel">Submission Date:</div>
                <div class="registrantField">{{submission.submissionDate | formatDate}}</div>
                <div class="clear"></div>
            </div>
            <div class="registrantSectionRow">
                <div class="registrantLabel">Screening Score:</div>
                <div class="registrantField"><span class="pass">{{submission.screeningScore}}</span></div>
                <div class="clear"></div>
            </div>
            <div class="registrantSectionRow">
                <div class="registrantLabel">Initial / Final Score:</div>
                <div class="registrantField"><a href="javascript:">{{submission.screeningScore}}/{{submission.finalScore}}</a></div>
                <div class="clear"></div>
            </div>
            <div class="registrantSectionRow">
                <div class="registrantLabel"><a href="javascript:" class="download">Download</a></div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="competitionDetails">
        <div class="registrant">
            <h2>Registrants</h2>
            <div class="values">
                <span class="count"><a ng-click="showRegistrants();" class="link">{{CD.challenge.numberOfRegistrants}}</a></span>
            </div>
        </div>
        <!--#/end registrant-->
        <div class="round {{!CD.checkpointData ? 'hide' : ''}}">
            <h2>Checkpoint</h2>
            <!--<div class="values">
                <span class="count"><span class="sup">&nbsp;</span></span>
                <span class="type">Submitter</span>
                <span class="type">&nbsp;</span>
            </div>-->
            <div class="values">
                <span class="count">{{CD.numCheckpointSubmissions}}</span>
                <span class="type">Submissions</span>
            </div>
            <!--<div class="values">
                <span class="count">N/A<span class="sup">(N/A%)</span></span>
                <span class="type">Passed Review</span>
            </div>-->
        </div>
        <!--#/end round-->
        <div class="round round2">
            <h2>Final</h2>
            <!--<div class="values">
                <span class="count"><span class="sup">&nbsp;</span></span>
                <span class="type">Submitter</span>
                <span class="type">&nbsp;</span>
            </div>-->
            <div class="values">
                <span class="count" ng-bind="CD.challenge.numberOfSubmissions"></span>
                <span class="type">Submissions</span>
            </div>
            <!--<div class="values">
                <span class="count">N/A<span class="sup">(N/A%)</span></span>
                <span class="type">Passed Review</span>
            </div>-->
        </div>
        <!--#/end round-->
        <div class="average">
            <h2>AVERAGE SCORES</h2>
            <div class="values">
                <span class="count">{{round(CD.initialScoreSum * 100.0 / CD.submissions.length) / 100}}<span class="sup">&nbsp;</span></span>
                <span class="type">Average</span>
                <span class="type">Initial Score</span>
            </div>
            <div class="values">
                <span class="count">{{round(CD.finalScoreSum * 100.0 / CD.submissions.length) / 100}}<span class="sup">&nbsp;</span></span>
                <span class="type">Average</span>
                <span class="type">Final Score</span>
            </div>
        </div>
        <!--#/end round-->
        <div class="clear"></div>
    </div>

</article>
<div ng-if="!CD.submissions || CD.submissions.length == 0">
    <div class="notView2">
        <p>
            <strong>Submissions are available after the review phase.</strong>
        </p>
    </div>
</div>

<?php include( locate_template('ng-content-submission-single-view.php') ); ?>

</div>
