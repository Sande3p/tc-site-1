<h3>Downloads:</h3>
<div class="inner">
  <ul class="downloadDocumentList">
    <li ng-if="CD.challenge.Documents && CD.challenge.Documents.length > 0 && CD.allowDownloads && CD.isRegistered" ng-repeat="document in CD.challenge.Documents">
      <a ng-if="!CD.isLC" href="{{document.url}}">{{document.documentName}}</a>
      <lc-download ng-if="CD.isLC" challenge-id="CD.lcChallengeId" file-id="document.id" document-name="document.documentName"></lc-download>
    </li>
    <li ng-if="CD.challenge.Documents && CD.challenge.Documents.length === 0 && CD.allowDownloads">
      <strong>None</strong>
    </li>
    <li ng-if="!CD.allowDownloads">
      <strong>Downloads are no longer available for this challenge</strong>
    </li>
    <li ng-if="!CD.challenge.Documents && CD.allowDownloads && CD.isLoggedIn && !CD.isRegistered">
      <strong>Register to Download Files (if available)</strong>
    </li>
    <li ng-if="!CD.challenge.Documents && CD.allowDownloads && !CD.isLoggedIn">
      <strong>Log In and Register to Download Files <br>(if available)</strong>
    </li>
  </ul>
</div>
