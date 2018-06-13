#include<bits/stdc++.h>
#define fs first
#define sc second
#define mp make_pair
#define pb push_back
#define pii pair<int,int>
#define mod 1000000007
using namespace std;

/*inline void scan(int* p) {
    static char c;
    while ((c = getchar_unlocked()) < '0');
    for (*p = c-'0'; (c = getchar_unlocked()) >= '0'; *p = *p*10+c-'0');
}*/

int main(){
	int t; cin >> t;
	
	for(int i = 0; i < t; i++){
		int p,a,m,r;
		cin >> p >> a >> m >> r;
		int cnt = 0;
		while(p > m){
			if(r > p){
				r -= p;
				cnt++;
			}
			p -= a;
		}
		cnt = cnt + r / m;
		cout << cnt << "\n";
	}
	
}



