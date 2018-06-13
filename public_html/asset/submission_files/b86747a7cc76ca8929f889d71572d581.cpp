////////////////////////////////////////////////
//                                            //
//  Author: Muhammad Faishol Amirul Mukminin  //
//                                            //
////////////////////////////////////////////////
#include <bits/stdc++.h>
using namespace std;

typedef long long ll;
typedef unsigned long long ull;
typedef pair<int,int> pi;
typedef pair<pi,int> pii;
typedef pair<ll,ll> pl;
typedef pair<pl,ll> pll;
typedef pair<double,double> pd;
typedef pair<pd,double> pdd;

#define FOR(i,x,y) for(int i=(x);i<(y);i++)
#define FORN(i,x,y) for(int i=(x);i<=(y);i++)
#define REV(i,a,b) for(int i=(a);i>(b);i--)
#define REVN(i,a,b) for(int i=(a);i>=(b);i--)

#define fi first
#define se second
#define PUB push_back
#define POB pop_back
#define PUF push_front
#define POF pop_front
#define ALL(v) (v).begin(),(v).end()
#define endl "\n"

const double EPS = 1e-9;
const double PI = acos(-1);
const ll MOD = 1e9+7;
const int INF = 0x7FFFFFFF;
const ll LINF = 0x7FFFFFFFFFFFFFFFLL;
const ull UINF = 0xFFFFFFFFFFFFFFFFLL;
const int dCol[] = {0,+1,0,-1,+1,+1,-1,-1};
const int dRow[] = {-1,0,+1,0,-1,+1,+1,-1};

template <typename T>
inline void VIN(vector<T> &i){ T x; cin >> x; i.PUB(x); }

int T, frek[30], cnt[100005], byk;
string S;
bool valid=0;

int main(){
	ios_base::sync_with_stdio(false); cin.tie(0); cout.tie(0);
		
	cin >> T;
	while(T--){
		memset(frek,0,sizeof frek);
		memset(cnt, 0, sizeof cnt);
		byk = 0; valid = 0;

		cin >> S;

		FOR(i,0,S.length()) frek[S[i]-'a']++;
		sort(frek,frek+30,greater<int>());

		FOR(i,0,30)
			if(frek[i]>0){
				cnt[frek[i]]++;
				byk++;
			}

		FOR(i,0,100005){
			if(cnt[i] > 0){
				if(byk-cnt[i]==0){
					valid = 1;
					break;
				}else if(byk-cnt[i] == 1){
					if(cnt[i+1]==1 || cnt[1]==1){
						valid = 1;
						break;
					}
				}
			}
		}

		if(valid) cout << "YES" << endl;
		else cout << "NO" << endl;
	}	
			
	return 0;
}