const storageKey = 'MintMindStorage';

export default {
    namespaced: true,
    state: {},
    getters: {
        GET_STORAGE_DATA: () => key => {
            if ((key !== null) && !['undefined', 'string', 'number'].includes(typeof key)) {
                throw new Error('Parameter "key" must be string, number, null or undefined in "GET_STORAGE_DATA" getter.');
            }

            let storageData = localStorage.getItem(storageKey);
            try {
                storageData = JSON.parse(storageData);

                if (_.isEmpty(storageData)) {
                    storageData = null;
                }

                if (storageData && (key || key === 0)) {
                    storageData = storageData[key];
                }
            } catch (e) {
                storageData = null;
            }

            return storageData;
        }
    },
    mutations: {
        SET_STORAGE_DATA: (state, {getters, key, value}) => {
            let storageData = getters['GET_STORAGE_DATA']();
            if (!storageData) {
                storageData = {[key]: value};
            } else {
                storageData[key] = value;
            }

            localStorage.setItem(storageKey, JSON.stringify(storageData));
        }
    },
    actions: {
        SET_STORAGE_DATA: ({commit, getters}, {key, value}) => {
            if (!['string', 'number'].includes(typeof key)) {
                throw new Error('Parameter "key" must be string or number in "SET_STORAGE_DATA" action.');
            }

            if (value === undefined) value = null;

            commit('SET_STORAGE_DATA', {getters, key, value});
        }
    }
};
