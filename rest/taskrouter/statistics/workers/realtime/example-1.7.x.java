// Install the Java helper library from twilio.com/docs/java/install
import com.twilio.Twilio;
import com.twilio.rest.taskrouter.v1.workspace.worker.WorkersStatistics;

public class Example {
  private static final String ACCOUNT_SID = "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
  private static final String AUTH_TOKEN = "your_auth_token";
  private static final String WORKSPACE_SID = "WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";

  public static void main(String[] args) {
    Twilio.init(ACCOUNT_SID, AUTH_TOKEN);

    WorkersRealTimeStatistics statistics = WorkersRealTimeStatistics.fetcher(WORKSPACE_SID).fetch();

    for (int i=0; i < statistics.getActivityStatistics().size(); i++) {
        final Map<String, Object> activityStat = statistics.getActivityStatistics().get(i);
        System.out.println(activityStat.get("workers") + " in " + activityStat.get("friendly_name"));
    }
  }
}
