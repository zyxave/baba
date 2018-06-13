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

long long a[105],b[105];

int main(){
	int t; cin >> t;
	
	for(int i = 0 ; i < t; i++){
		int n,d,r; cin >> n >> d >> r;
		for(int j = 0; j < n; j++){
			cin >> a[j];
		}
		for(int k = 0; k < n; k++){
			cin >> b[k];
		}
		sort(a, a + n);
		sort(b, b + n);
		long long ans = 0;
		for(int j = 0; j < n; j++){
			long long ini = a[j] + b[n - 1 - j];
			ini -= d;
			ini = max((long long)0, ini);
			ans = ans + ini * r;
		}
		cout << ans << "\n";
	}
}



