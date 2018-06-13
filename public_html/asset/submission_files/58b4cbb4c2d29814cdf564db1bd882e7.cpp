#include <iostream>
#include <string.h>
using namespace std;
int main()
{
    int T;
    cin >> T;
    for(int a = 1; a <= T; a++) {
        char s[100000];
        cin >> s;
        bool notsame = false;
        int lowercase[26], pos = 97;
        for(int i = 0; i < strlen(s); i++) {
            if(s[i] != pos) pos = s[i];
            if(s[i] < pos) {
                notsame = true;
                break;
            }
            lowercase[s[i]-97]++;
        }
        if(notsame == false) {
            for(int i = 0; i < 25; i++) {
                int next = i+1;
                while(next < 25 && lowercase[next] == 0) next++;
                if(lowercase[i] != lowercase[next] && lowercase[i] != 0 && lowercase[next] != 0) {
                    if(lowercase[next] != lowercase[i]+1 && lowercase[next] != 1) {
                        notsame = true;
                        break;
                    }
                }
            }
        }
        if(notsame) cout << "NO" << endl;
        else cout << "YES" << endl;
        cout << endl;
    }
    return 0;
}
