#include<bits/stdc++.h>
#define fs first
#define sc second
#define mp make_pair
#define pb push_back
#define pii pair<int,int>
#define MAXLL 1000000000000000000
using namespace std;

/*inline void scan(int* p) {
    static char c;
    while ((c = getchar_unlocked()) < '0');
    for (*p = c-'0'; (c = getchar_unlocked()) >= '0'; *p = *p*10+c-'0');
}*/

long long depe[100005];
int n,x,y;

int main(){
	int t; cin >> t;
	for(int i = 0 ; i < t; i++){
		if(i != 0) cout << "\n";
		cin >> n >> x >> y;
		pair<long long, string> jawab[105];
		for(int j = 0; j < n; j++){
			string dummy;
			int a,b;
			cin >> jawab[j].sc >> dummy >> a >> b;
			for(int k = 0; k < jawab[j].sc.length(); k++){
				jawab[j].sc[k] = tolower(jawab[j].sc[k]);
			}
			int xx = x,yy = y;
			depe[x] = 0;
			for(int k = x - 1; k >= y; k--){
				long long &ret = depe[k];
				ret = MAXLL;
				if(2 * k <= x) ret = min(ret, depe[2 * k] + b);
				if(2 * k + 1 <= x) ret = min(ret, depe[2 * k + 1] + b);
				ret = min(ret, depe[k + 1] + a);
			}
			jawab[j].fs = depe[y];
		}
		sort(jawab, jawab + n);
		for(int j = 0; j < n; j++){
			cout << jawab[j].sc << " : " << jawab[j].fs << "\n";
		}
	}
}



