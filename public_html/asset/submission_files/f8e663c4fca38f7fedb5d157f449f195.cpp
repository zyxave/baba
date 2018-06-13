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
		string baca; cin >> baca;
		
		int nyak[26];
		int nilai[100005];
		int ada = 0;
		memset(nyak, 0, sizeof(nyak));
		memset(nilai, 0, sizeof(nilai));
		for(int j = 0; j < baca.length(); j++){
			nyak[baca[j] - 'a']++;
		}
		
		int tik = -1, tak = -1;
		for(int j = 0; j < 26; j++){
			if(nyak[j] == 0) continue;
			nilai[nyak[j]]++;
			if(nilai[nyak[j]] == 1){
				ada++;
				if(tik == -1) tik = nyak[j];
				else if(tak == -1) tak = nyak[j];
			}
		}
		
		if(ada >= 3) {
			cout << "NO\n";
			continue;
		}
		if(ada == 1) {
			cout << "YES\n";
			continue;
		}
		if(tik < tak){
			int dummy = tik;
			tik = tak;
			tak = dummy;
		}
	//	cout << ada << " " << tik << " " << tak << "\n";
		if((nilai[tik] == 1 && tik - tak == 1) || (tak == 1 && nilai[tak] == 1)) {
			cout << "YES\n";
		}
		else cout << "NO\n";
		
	}
}



