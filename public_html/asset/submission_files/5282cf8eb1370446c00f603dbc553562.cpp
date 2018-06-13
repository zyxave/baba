#include<iostream>
#include<string>
#include<algorithm>
#include<string.h>
using namespace std;

int n;
string s;
int x[1010101];
int hit[1010101];

int main(){
	int n;
	cin>>n;
	while(n--){
		memset(x,0,sizeof(x));
		bool ans=0;
		cin>>s;
		for(int i=0;i<s.length();i++){
			x[int(s[i])-97]++;
		}
		int maks=0;
		int mins=0;
		sort(x,x+26);
		int a=0;
		while(x[a]==0){
			a++;
		}
		maks=x[25];
		mins=x[a];
		int cnt=0;
		int hitung=0;
		memset(hit,0,sizeof(hit));
		for(int i=a;i<26;i++){
			if(x[i]>0){
				if(hit[x[i]]==false){
					cnt++;
					hit[x[i]]=true;
				}
			}
		}
		//cout<<cnt<<endl;
		int satu=0;
		if(cnt==1){
			ans=true;
		}
		else{
			if(cnt==2){
				if(mins==1){
					for(int i=a;i<26;i++){
						if(x[i]==1){
							satu++;
						}
					}
					if(satu==1||satu==25-a){
						ans=true;
					}
				}
				else{
					if(maks-mins==1){
						for(int i=a;i<26;i++){
							if(x[i]==maks){
								hitung++;
							}
						}
						if(hitung==1){
							ans=true;
						}
					}
				}
			}
		}
		if(ans){
			cout<<"YES"<<endl;
		}
		else cout<<"NO"<<endl;
	}
}