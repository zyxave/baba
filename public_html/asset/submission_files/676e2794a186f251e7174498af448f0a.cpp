#include<bits/stdc++.h>
#define ll long long
using namespace std;
set<int>ver,hor,ph,pv;
set<int>::iterator lo,hi;
int t,n,m,q,x,y;
int ch[100003],cv[100003];

bool udah[1005];
int cnt;
map<string,int> haha;

int main(){
	int t; cin >> t;
	
	for(int i = 0 ; i < t; i ++){
		memset(udah,false,sizeof(udah));
		haha.clear();
		int q; cin >> q;
		char aaa;
		aaa=getchar();
		for(int j = 0; j < q; j++){
			string ss="";
			char a;
			bool udah=false;
			while(1){
				a=getchar();
				if(a == '\n') break;
				if(a!=' ')ss+=a;
			}
		//	cout<<ss<<endl;
			if(!haha.count(ss)){
				haha[ss] = j + 1;
			}
		}
		int s; cin >> s;
		char dummy; dummy = getchar();
		cnt = 0;
		int jawab = 0;
		for(int j = 0 ; j < s; j++){
			string baca="";
			char a;
			while(1){
				a=getchar();
				if(a == '\n') break;
				if(a!=' ')baca+=a;
			}
			if(haha.count(baca)){
				if(!udah[haha[baca]]){
					cnt++;
				}
				udah[haha[baca]] = true;
			}
			if(cnt == q){
				jawab = jawab + 1;
				memset(udah,false,sizeof(udah));
				cnt = 0;
			}
		}
		cout << jawab << "\n";
	}
	
}
