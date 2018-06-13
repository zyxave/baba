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

int T, cnt = 0, N[15];
string S;
vector<string> tim[15], ans[15];
set<string> alias;

bool isValid(string a, string b){
	if(b.find(" ") < b.length()) return 0;
	else if(a.length()<3 || a.length() > 20) return 0;
	else if(b.length()<3 || b.length() > 20) return 0;
	
	return 1; 
}

int keangka(string a){
	int r=0;
	FOR(i,0,a.length()){
		r *= 10;
		r += a[i]-'0';
	}

	return r;
}

int main(){
	ios_base::sync_with_stdio(false); cin.tie(0); cout.tie(0);
	
	cin >> T;

	FOR(i,0,T){
		int N;
		string a, b;
		cin >> N;
		
		alias.clear();

		FOR(i,0,N){
			cin >> a >> b;
			if(!isValid(a,b)){
				ans[i].clear();
				ans[i].PUB("GAGAL");
				break;
			}
			string tmp = "";
			FOR(i,0,3) tmp += toupper(a[i]);

			if(alias.find(tmp) != alias.end()){
				tmp[2] = toupper(b[0]);
				if(alias.find(tmp) != alias.end()){
				ans[i].clear();
				ans[i].PUB("GAGAL");
				break;
			}else{
				alias.insert(tmp);
				ans[i].PUB(tmp);
			}
			}else{
				alias.insert(tmp);
				ans[i].PUB(tmp);
			}
		}
	}

	FOR(i,0,T){
		FOR(j,0,ans[i].size()){
			cout << ans[i][j];
			if(j < ans[i].size()) cout << " ";
		} cout << endl;
	}		
	return 0;
}