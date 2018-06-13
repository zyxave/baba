#include<bits/stdc++.h>

using namespace std;

int main(){
	int tc; scanf("%d", &tc);
	while(tc--){
		string baca; cin >> baca;
		map<int, int> mp;
		vector<int> vec;
		int now = 1, lol = 1;
		for(int i = 1; i < baca.length(); i++){
			if(baca[i] != baca[i - 1]){
				mp[lol] = now;
				now = 1; lol++;
			}else now++;
			if(i == baca.length() - 1) mp[lol] = now;
		}//cout << lol << "ok" << endl;
				//for(int i = 1; i <= 3; i++) cout << mp[i] << "\n";
		bool cek = 1, ppp = 1;
		if(lol == 1){
			cout << "YES" << "\n";
			continue;
		}
		for(int i = 2; i < lol + 1; i++){
			if(mp[i] != mp[i - 1] && cek){
				cek = 0;
				if(mp[i] < mp[i - 1]){
					if(mp[i] - 1 == 0){
						mp[i]--;
					}
					else{
						mp[i - 1]--;
						if(mp[i - 1] != mp[i]){
							ppp = 0; break;
						}
					}
				}else{
					if(mp[i - 1] - 1 == 0) mp[i - 1]--;
					else{
						mp[i]--;
						if(mp[i - 1] != mp[i]){
							ppp = 0; break;
						}
					}
				}
			}else if((mp[i] != mp[i - 1] && !cek)){
				ppp = 0; break;
			}
		}
		if(ppp) printf("YES\n");
		else printf("NO\n");
	}
	return 0;
}
